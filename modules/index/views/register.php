<?php
/**
 * @filesource modules/index/views/register.php
 *
 * @copyright 2016 Goragod.com
 * @license https://www.kotchasan.com/license/
 *
 * @see https://www.kotchasan.com/
 */

namespace Index\Register;

use Kotchasan\Html;
use Kotchasan\Http\Request;

/**
 * module=register
 *
 * @author Goragod Wiriya <admin@goragod.com>
 *
 * @since 1.0
 */
class View extends \Gcms\View
{
    /**
     * ลงทะเบียนสมาชิกใหม่
     *
     * @param Request $request
     *
     * @return string
     */
    public function render(Request $request)
    {
        // หมวดหมู่
        $category = \Index\Category\Model::init(false);
        // form
        $form = Html::create('form', [
            'id' => 'setup_frm',
            'class' => 'setup_frm',
            'autocomplete' => 'off',
            'action' => 'index.php/index/model/register/submit',
            'onsubmit' => 'doFormSubmit',
            'ajax' => true,
            'token' => true
        ]);
        $fieldset = $form->add('fieldset', [
            'title' => '{LNG_Details of} {LNG_User}'
        ]);
        $groups = $fieldset->add('groups');
        // username
        $groups->add('text', [
            'id' => 'register_username',
            'itemClass' => 'width50',
            'labelClass' => 'g-input icon-user',
            'label' => self::usernameLabel(),
            'comment' => '{LNG_Username used for login or request a new password}',
            'maxlength' => 50,
            'validator' => ['keyup,change', 'checkUsername', 'index.php/index/model/checker/username']
        ]);
        // name
        $groups->add('text', [
            'id' => 'register_name',
            'labelClass' => 'g-input icon-customer',
            'itemClass' => 'width50',
            'label' => '{LNG_Name}',
            'maxlength' => 150,
            'placeholder' => '{LNG_Please fill in} {LNG_Name}'
        ]);
        $groups = $fieldset->add('groups');
        // password
        $groups->add('password', [
            'id' => 'register_password',
            'itemClass' => 'width50',
            'labelClass' => 'g-input icon-password',
            'label' => '{LNG_Password}',
            'comment' => '{LNG_Passwords must be at least four characters}',
            'maxlength' => 50,
            'showpassword' => true,
            'validator' => ['keyup,change', 'checkPassword']
        ]);
        // repassword
        $groups->add('password', [
            'id' => 'register_repassword',
            'itemClass' => 'width50',
            'labelClass' => 'g-input icon-password',
            'label' => '{LNG_Confirm password}',
            'comment' => '{LNG_Enter your password again}',
            'maxlength' => 50,
            'showpassword' => true,
            'validator' => ['keyup,change', 'checkPassword']
        ]);

//
	 $groups = $fieldset->add('groups');

 // usernamexxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
        $groups->add('text', [
            'id' => 'register_phone',
            'itemClass' => 'width50',
            'labelClass' => 'g-input icon-user',
            'label' => '{LNG_Phone}',
            'comment' => '{LNG_Phone}',
            'maxlength' => 50
       ]);


        // หมวดหมู่
        $a = 0;
        foreach ($category->items() as $k => $label) {
            if (!$category->isEmpty($k)) {
                if (in_array($k, self::$cfg->categories_multiple)) {
                    $fieldset->add('checkboxgroups', [
                        'id' => 'register_'.$k,
                        'itemClass' => 'item',
                        'label' => $category->name($k),
                        'labelClass' => 'g-input icon-group',
                        'options' => $category->toSelect($k)
                    ]);
                } else {
                    if ($a % 2 == 0) {
                        $groups = $fieldset->add('groups');
                    }
                    $a++;
                    $groups->add('text', [
                        'id' => 'register_'.$k,
                        'labelClass' => 'g-input icon-menus',
                        'itemClass' => 'width50',
                        'label' => $label,
                        'datalist' => $category->toSelect($k),
                        'text' => true
                    ]);
                }
            }
        }
        if ($a % 2 == 0) {
            $groups = $fieldset->add('groups');
        }
        // status
        $groups->add('select', [
            'id' => 'register_status',
            'itemClass' => 'width50',
            'label' => '{LNG_Member status}',
            'labelClass' => 'g-input icon-star0',
            'options' => self::$cfg->member_status,
            'value' => 0
        ]);
        // permission
        $fieldset->add('checkboxgroups', [
            'id' => 'register_permission',
            'itemClass' => 'item',
            'label' => '{LNG_Permission}',
            'labelClass' => 'g-input icon-list',
            'options' => \Gcms\Controller::getPermissions(),
            'value' => \Gcms\Controller::initModule([], 'newRegister')
        ]);
        $fieldset = $form->add('fieldset', [
            'class' => 'submit'
        ]);
        // submit
        $fieldset->add('submit', [
            'class' => 'button save large icon-register',
            'value' => '{LNG_Register}'
        ]);
        $fieldset->add('hidden', [
            'id' => 'register_id',
            'value' => 0
        ]);
        // คืนค่า HTML
        return $form->render();
    }
}
