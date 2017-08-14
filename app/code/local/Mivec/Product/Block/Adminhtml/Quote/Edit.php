<?php
class Mivec_Product_Block_Adminhtml_Quote_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function _construct()
    {
        parent::_construct(); // TODO: Change the autogenerated stub

        $this->_objectId = "id";
        $this->_blockGroup = "product";
        $this->_controller = "adminhtml_quote";

        $this->_updateButton("save" , "label" , "Save");
        $this->_updateButton("delete" , "label" , "Delete");

        $this->_addButton("saveandcontinue" , array(
            "label"     => "Save And Continue Edit",
            "onclick"   => "saveAndContinueEdit()",
            "class"     => "save"
        ) , -100);

        $this->_formScripts[] = "
            function toggleEditor() 
            {
                if (tinyMCE.getInstanceById('content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'content');
                }
            }
            function saveAndContinueEdit()
            {
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('quote_data') && Mage::registry('quote_data')->getId() ) {
            return Mage::helper('product')->__("Edit Product Quote '%s'" , "");
        } else {
            return "";
        }
    }
}