<?php

namespace App\View\Helper;

use Cake\View\Helper;
use Cake\Utility\Inflector;

class CustomFormHelper extends Helper {
    
    public $_this;
    public $params;
    public $formId;
    public $field;
    public $fieldNo;
    public $fieldLabel;
    public $fieldValue;
    public $fieldId;
    public $obj;
    public $scripts = [];
    public $hasSelectBox = false;
    
    public $setValidations = true;
    public $validations;
    public $validationLabel;
    public $validationRules;
    public $validationMessages;
    
    
    public function create($_this, $params = [], $object = null) {
        $this->_this = $_this;
        $this->obj = $object;
        $this->params = $params;
        if (!empty($this->params['form'])) {
            ?>
            <?php $this->formId = $_this->request->getParam('action') . $_this->request->getParam('controller'); ?>
            <?php if (empty($this->params['form']['options'])) { ?>
                <?= $_this->Form->create($this->obj, ['id' => $this->formId]) ?>
            <?php } else {
                if (empty($this->params['form']['options']['id'])) {
                    $this->params['form']['options']['id'] = $this->formId;
                } else {
                    $this->formId = $this->params['form']['options']['id'];
                }
                ?>
                <?= $_this->Form->create($this->obj, $this->params['form']['options']) ?>
            <?php } ?>
            <?php
            if (empty($this->params['form']['validate'])) {
                $this->validations['ignore'] = ":hidden:not(.not-ignore)";
            } else {
                $validate = $this->params['form']['validate'];
                $this->setValidations = empty($validate['validations']) ? true : $validate['validations'];
                if ($this->setValidations) {
                    $this->validations['ignore'] = empty($validate['ignore']) ? ":hidden:not(.ignore)" : $validate['ignore'];
                    if (!empty($validate['submitHandler'])) {
                        $this->validations['submitHandler'] = 'function (form) { ' . $validate['submitHandler'] . ' }';
                    }
                }
            }
            
            ?>
            <div class="row p-lg-4">
                <?php
                foreach ($this->params['fields'] as $index => $field) {
                    $this->fieldNo = $index;
                    $this->field = $field;
                    $this->getFieldLabel();
                    $this->getFieldId();
                    
                    ?>
                    <?php if (isset($this->field['type']) && $this->field['type'] == "hidden") { ?>
                        <?php $this->createField(); ?>
                    <?php } else { ?>
                        <div class="col-md-<?= $this->columns(); ?>">
                            <?php $this->createField(); ?>
                        </div>
                    <?php } ?>
                    <?php if ($this->setValidations) {
                        $this->validateField();
                    } ?>
                <?php } ?>
                <div class="col-md-12">
                    <?php
                    $this->submit();
                    $this->cancel();
                    ?>
                </div>
            </div>
            <?= $this->_this->Form->end() ?>
            <?php
            
            if ($this->setValidations) {
                $this->validate();
            }
            $this->script();
        }
    }
    
    public function createField() {
        $this->field['type'] = empty($this->field['type']) ? "text" : $this->field['type'];
        switch ($this->field['type']) {
            case 'suggestions' :
                {
                    $this->scripts[] = $this->suggestionsScript();
                    $this->suggestions();
                    break;
                }
            case 'textarea' :
                {
                    $this->textArea();
                    break;
                }
            case 'select' :
                {
                    if (!$this->hasSelectBox) {
                        $this->scripts[] = "$('.js-select').selectpicker();";
                        $this->hasSelectBox = true;
                    }
                    if (!empty($this->field['depend'])) {
                        $this->scripts[] = $this->selectDependOn();
                    }
                    $this->select();
                    break;
                }
            case 'checkbox' :
            case 'check' :
                {
                    $this->check();
                    break;
                }
            case 'radio' :
                {
                    $this->input();
                    break;
                }
            case 'toggle' :
                {
                    $this->toggle();
                    break;
                }
            case 'hidden' :
                {
                    $this->hidden();
                    break;
                }
            default :
                {
                    $this->input();
                    break;
                }
            
        }
    }
    
    
    public function input() {
        $inputClasses = "form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14 g-py-10  not-ignore";
        $iconClasses = "g-absolute-centered--y g-right-0 d-block g-width-50 g-height-22 g-brd-left g-brd-gray-light-v7";
        ?>
        <div class="form-group g-mb-30">
            <label class="g-mb-10" for="<?= $this->fieldId; ?>"><?= $this->fieldLabel ?></label>
            
            <div class="g-pos-rel">
                <?php if (!empty($this->field['icon'])) { ?>
                    <span
                        class="<?= $iconClasses; ?>">
	                  	<i class="<?= $this->field['icon']; ?> g-absolute-centered g-font-size-16 g-color-gray-light-v6"></i>
	                	</span>
                <?php } ?>
                <?= $this->_this->Form->control($this->field['name'], [
                    'type' => empty($this->field['type']) ? 'text' : $this->field['type'],
                    'label' => false,
                    'class' => $inputClasses,
                    'id' => $this->fieldId,
                    'placeholder' => $this->fieldLabel,
                ]);
                ?>
            </div>
        </div>
        <?php
    }
    
    public function hidden() {
        echo $this->_this->Form->control($this->field['name'], [
            'type' => 'hidden',
            'id' => $this->fieldId,
            'value' => empty($this->field['value']) ? "" : $this->field['value']
        ]);
    }
    
    public function textArea() {
        $classes = "form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus g-rounded-4";
        ?>
        <div class="form-group g-mb-30">
            <label class="g-mb-10" for="<?php $this->fieldId ?>"><?php $this->fieldLabel ?></label>
            <?= $this->_this->Form->control($this->field['name'], [
                'type' => 'textarea',
                'label' => false,
                'class' => $classes,
                'id' => $this->fieldId,
                'placeholder' => $this->fieldLabel,
            ]);
            ?>
        </div>
        <?php
    }
    
    public function select() {
        $classes = "js-select u-select--v3-select u-sibling w-100";
        $dropIconClasses = "d-flex align-items-center g-absolute-centered--y g-right-0 g-color-gray-light-v6 g-color-lightblue-v9--sibling-opened g-mr-15";
        ?>
        <div class="g-mb-30">
            <label class="g-mb-10"><?= $this->fieldLabel; ?></label>
            
            <div class="form-group u-select--v3 g-pos-rel g-brd-gray-light-v7 g-rounded-4 mb-0">
                <select name="<?= $this->field['name']; ?>" class="<?= $classes; ?>" title="<?= $this->fieldLabel; ?>"
                        style="display: none;" data-live-search="true" id="<?= $this->fieldId; ?>">
                    <?php foreach ($this->field['options'] as $value => $label) { ?>
                        <option value="<?= $value; ?>"
                                data-content='<span class="d-flex align-items-center w-100"><span><?= $label; ?></span></span>'><?= $label; ?></option>
                    <?php } ?>
                </select>
                <div
                    class="<?= $dropIconClasses; ?>">
                    <i class="hs-admin-angle-down"></i>
                </div>
            </div>
            <label for="<?= $this->fieldId; ?>" class="error"></label>
        </div>
        <?php
    }
    
    public function check() {
        $inputClasses = "g-hidden-xs-up g-pos-abs g-top-0 g-left-0 not-ignore";
        $labelClasses = "u-check-icon-checkbox-v4 g-absolute-centered--y g-left-0";
        ?>
        <div class="g-mb-30">
            <label class="g-mb-10"><?= $this->fieldLabel; ?></label>
            <?php foreach ($this->field['options'] as $value => $label) { ?>
                <div class="form-group g-mb-10">
                    <label class="u-check g-pl-25">
                        <input class="<?= $inputClasses; ?>" type="checkbox" name="<?= $this->field['name'] ?>[]"
                               id="<?= $this->fieldId; ?>" value="<?= $value; ?>">
                        <div class="<?= $labelClasses; ?>">
                            <i class="fa" data-check-icon=""></i>
                        </div>
                        <?= $label; ?>
                    </label>
                </div>
                <?= empty($this->field['horizontal']) ? "" : ""; ?>
            <?php } ?>
        </div>
        <?php
    }
    
    public function radio() {
        $inputClasses = "g-hidden-xs-up g-pos-abs g-top-0 g-left-0 not-ignore";
        $labelClasses = "u-check-icon-font g-absolute-centered--y g-left-0";
        
        ?>
        <?php foreach ($this->field['options'] as $value => $label) { ?>
            <div class="form-group g-mb-10">
                <label class="u-check g-pl-25">
                    <input class="<?= $inputClasses; ?>" type="radio" name="<?= $this->field['name'] ?>"
                           id="<?= $this->fieldId; ?>" value="<?= $value; ?>">
                    <div class="<?= $labelClasses; ?>">
                        <i class="fa" data-check-icon="" data-uncheck-icon=""></i>
                    </div>
                    <?= $label; ?>
                </label>
            </div>
            <?= empty($this->field['horizontal']) ? "" : ""; ?>
            <label for="<?= $this->fieldId; ?>" class="error"></label>
        <?php } ?>
        <?php
    }
    
    public function toggle() {
        $inputClasses = "g-hidden-xs-up g-pos-abs g-top-0 g-right-0 not-ignore";
        $labelClasses = "form-check-inline u-check mt-0 mb-0";
        
        ?>
        <div class="g-mb-30">
            <label class="<?= $labelClasses; ?>" style="top: -3px !important;">
                <input class="<?= $inputClasses; ?>" name="<?= $this->field['name'] ?>"
                       id="<?= $this->fieldId; ?>"
                       value="<?= $this->fieldValue; ?>" <?= ($this->fieldValue) ? "checked" : ""; ?> type="checkbox">
                <div class="u-check-icon-radio-v7">
                    <i class="fa" data-check-icon="&#xf00c"></i>
                </div>
            </label>
            <label class="mt-0 mb-0 mr-3"><?= $this->fieldLabel; ?> </label><br />
            <label for="<?= $this->field['name']; ?>" class="error"></label>
            <label for="<?= $this->fieldId; ?>" class="error"></label>
        </div>
        
        
        
        <?php
    }
    
    public function datePicker() {
        $wrapperClasses = "u-datepicker-right u-datepicker--v3 g-pos-rel w-100 g-cursor-pointer g-brd-around g-brd-gray-light-v7 g-rounded-4";
        $iconWrapperClasses = "d-flex align-items-center g-absolute-centered--y g-right-0 g-color-gray-light-v6 g-color-lightblue-v9--sibling-opened g-mr-15";
        $inputClasses = "js-range-datepicker g-bg-transparent g-font-size-12 g-font-size-default--md g-color-gray-dark-v6 g-pr-80 g-pl-15 g-py-9 not-ignore";
        ?>
        <div class="form-group mb-0 g-max-width-400">
            <label class="g-mb-10"><?= $this->fieldLabel; ?></label>
            <div id="<?= $this->fieldId; ?>Wrapper" class="<?= $wrapperClasses; ?>">
                <input class="<?= $inputClasses; ?>"
                       name="<?= $this->field['name']; ?>"
                       id="<?= $this->fieldId; ?>"
                       type="text"
                       placeholder="Select Date"
                       data-rp-wrapper="<?= $this->fieldId; ?>Wrapper"
                       data-rp-date-format="d/m/Y"
                >
                <div class="<?= $iconWrapperClasses; ?>">
                    <i class="hs-admin-calendar g-font-size-18 g-mr-10"></i>
                    <i class="hs-admin-angle-down"></i>
                </div>
            </div>
        </div>
        <?php
    }
    
    public function suggestions() {
        $inputClasses = "form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14 g-py-10 not-ignore";
        $iconClasses = "g-absolute-centered--y g-right-0 d-block g-width-50 g-height-22 g-brd-left g-brd-gray-light-v7";
        ?>
        <div class="form-group g-mb-30">
            <label class="g-mb-10" for="<?= $this->fieldId; ?>"><?= $this->fieldLabel ?></label>
            
            <div class="g-pos-rel">
                <?php if (!empty($this->field['icon'])) { ?>
                    <span
                        class="<?= $iconClasses; ?>">
	                  	<i class="<?= $this->field['icon']; ?> g-absolute-centered g-font-size-16 g-color-gray-light-v6"></i>
	                	</span>
                <?php } ?>
                <?= $this->_this->Form->control(str_replace('_id', '', $this->field['name']), [
                    'type' => 'text',
                    'label' => false,
                    'class' => $inputClasses,
                    'id' => $this->fieldId,
                    'placeholder' => $this->fieldLabel,
                ]);
                ?>
                <?= $this->_this->Form->control($this->field['name'], [
                    'type' => 'hidden',
                    'id' => $this->fieldId . "ID",
                    'class' => "not-ignore"
                ]);
                ?>
            </div>
        </div>
        <?php
    }
    
    public function submit() {
        $label = empty($this->params['submit']['label']) ? "Save" : $this->params['submit']['label'];
        $classes = empty($this->params['submit']['classes']) ? "btn-u-lg btn-u btn-u-blue rounded" : $this->params['submit']['classes'];
        $icon = empty($this->params['submit']['icon']) ? "fa fa-save" : $this->params['submit']['icon'];
        ?>
        <button type="submit" class="<?= $classes; ?>">
            <i class="<?= $icon; ?>"></i> <?= $label; ?></button>
        <?php
    }
    
    public function cancel() {
        $label = empty($this->params['cancel']['label']) ? "Cancel" : $this->params['submit']['label'];
        $classes = empty($this->params['cancel']['classes']) ? "btn-u-lg btn-u btn-u-orange rounded  " : $this->params['submit']['classes'];
        $url = empty($this->params['cancel']['url']) ? $this->_this->request->referer() : empty($this->params['cancel']['url']);
        $icon = empty($this->params['cancel']['icon']) ? "fa fa-close" : $this->params['cancel']['icon'];
        ?>
        <a href="<?= $url; ?>" class="<?= $classes; ?>">
            <i class="<?= $icon; ?>"></i> <?= $label; ?>
        </a>
        <?php
    }
    
    
    public function getFieldValue() {
        $this->fieldValue = empty($this->obj->{$this->field['name']}) ? false : $this->obj->{$this->field['name']};
    }
    
    public function getFieldLabel() {
        if (empty($this->field['label'])) {
            $name = (strpos($this->field['name'], '_id') !== false) ? str_replace('_id', '', $this->field['name']) : $this->field['name'];
            $this->fieldLabel = Inflector::humanize($name);
        } else {
            $this->fieldLabel = $this->field['label'];
        }
    }
    
    public function getFieldId() {
        $this->fieldId = (empty($this->field['id'])) ? Inflector::camelize($this->field['name']) : $this->field['id'];
    }
    
    public function columns() {
        if (!empty($this->field['columns'])) {
            $columns = $this->field['columns'];
        } else if (!empty($this->params['columns'])) {
            $columns = $this->params['columns'];
        } else {
            $columns = 6;
        }
        return $columns;
    }
    
    public function script() {
        ?>
        <script>
            $(function () {
                $.validator.addMethod("pwcheck", function (value) {
                    return /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W).*$/.test(value) // consists of only these
                        &&
                        /[A-Z]/.test(value) // has a uppercase letter
                        &&
                        /\d/.test(value); // has a digit
                }, "Password must contain atleast one capital character, one numaric ande one special characters");
    
                $.validator.addMethod("phoneUS", function (phone_number, element) {
                    phone_number = phone_number.replace(/\s+/g, "");
                    return this.optional(element) || phone_number.length > 9 &&
                        phone_number.match(/^(\+?1-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/);
                }, "Please specify a valid phone number");
                
                <?= implode("\n", $this->scripts); ?>
            });
        </script>
        <?php
    }
    
    public function selectDependOn() {
        extract($this->field['depend']);
        return "$('#$id').change(function () {
            $.ajax({
                url: SITE_URL + 'helpers/getOptions',
                type: \"POST\",
                data: {query: $(this).val(), find: '$model', match: '$match' },
                dataType: \"json\",
                success: function (response) {
                    if (response.suggestions.length > 0) {
                        var options = [];
                        options.push('<option class=\"bs-title-option\" value=\"\">City</option>');
                        $.each(response.suggestions, function (index, data) {
                            options.push('<option value=\"' + data.value + '\" data-content=\'<span class=\"d-flex align-items-center w-100\">' + data.label + '</span>\'>' + data.label + '</option>');
                        });
                        
                        $('#" . $this->fieldId . "').html(options.join(''));
    
                        $('#" . $this->fieldId . "').selectpicker('refresh');
                    }
                    
                }
            });
        });";
    }
    
    public function suggestionsScript() {
        if (empty($this->field['suggestions'])) {
            return "";
        } else {
            
            $params = [
                'find' => $this->field['suggestions']['model'],
                'select' => empty($this->field['suggestions']['select']) ? "name" : $this->field['suggestions']['select'],
                'match' => empty($this->field['suggestions']['match']) ? "name" : implode(",", $this->field['suggestions']['match']),
            ];
            
            if (!empty($this->field['suggestions']['conditions'])) {
                $params['conditions'] = $this->field['suggestions']['conditions'];
            }
            
            return "$('#" . $this->fieldId . "').autocomplete({
                serviceUrl: SITE_URL + 'helpers/getSuggestions',
                params: " . json_encode($params) . ",
                lookupFilter: function (suggestion, originalQuery, queryLowerCase) {
                    var re = new RegExp('\\b' + $.Autocomplete.utils.escapeRegExChars(queryLowerCase), 'gi');
                    return re.test(suggestion.name);
                },
                onSelect: function (suggestion) {
                    $('#" . $this->fieldId . "ID').val(suggestion.id);
                },
                onInvalidateSelection: function () {
                    console.log('You selected: none');
                    $('#" . $this->fieldId . "ID').val('');
                } });";
        }
    }
    
    public function validate() {
        $this->scripts[] = '$("#' . $this->formId . '").validate(' . preg_replace('/"([a-zA-Z]+[a-zA-Z0-9_]*)":/', '$1:', json_encode($this->validations)) . ');';
    }
    
    public function validateField() {
        $label = strtolower($this->fieldLabel);
        if (empty($this->field['validate'])) {
            $this->validationRules['required'] = true;
        } else {
            $this->validationRules = empty($this->field['validate']['rules']) ? ['required' => true] : $this->field['validate']['rules'];
            $this->validationMessages = empty($this->field['validate']['messages']) ? [] : $this->field['validate']['messages'];
        }
        
        foreach ($this->validationRules as $type => $value) {
            
            $this->validations['rules'][$this->field['name']][$type] = $value;
            if (empty($this->validationMessages[$type])) {
                switch ($type) {
                    case 'required':
                        {
                            $text = in_array($this->field['type'], ['select', 'check', 'radio', 'toggle']) ? "select" : "enter";
                            $this->validations['messages'][$this->field['name']][$type] = "Please $text $label.";
                            break;
                        }
                    case 'email':
                        {
                            $this->validations['messages'][$this->field['name']][$type] = "Please enter valid email.";
                            break;
                        }
                    case 'remote':
                        {
                            $this->validations['messages'][$this->field['name']][$type] = "Email already exists.";
                            break;
                        }
                    case 'min':
                        {
                            $this->validations['messages'][$this->field['name']][$type] = ucfirst($label) . " must be greater than $value.";
                            break;
                        }
                    case 'max':
                        {
                            $this->validations['messages'][$this->field['name']][$type] = ucfirst($label) . " must be less than $value.";
                            break;
                        }
                    case 'minlength':
                        {
                            $this->validations['messages'][$this->field['name']][$type] = ucfirst($label) . " must be greater than $value characters.";
                            break;
                        }
                    case 'maxlength':
                        {
                            $this->validations['messages'][$this->field['name']][$type] = ucfirst($label) . " must be less than $value characters.";
                            break;
                        }
                    case 'url':
                        {
                            $this->validations['messages'][$this->field['name']][$type] = "Please enter valid url.";
                            break;
                        }
                    case 'pwcheck':
                    case 'password':
                        {
                            $this->validations['messages'][$this->field['name']][$type] = ucfirst($label) . " must contain atleast one capital character, one numeric and one special character.";
                            break;
                        }
                    case 'phone':
                    case 'phoneUS':
                        {
                            $this->validations['messages'][$this->field['name']][$type] = "Please specify a valid phone number.";
                            break;
                        }
                    case 'equalTo':
                        {
                            $this->validations['messages'][$this->field['name']][$type] = "Password does not match.";
                            break;
                        }
                    
                }
            } else {
                $this->validations['messages'][$this->field['name']][$type] = $this->validationMessages[$type];
            }
        }
        
        
    }
    
    
}
