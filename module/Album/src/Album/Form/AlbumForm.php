<?php namespace Album\Form;

use Zend\Form\Form;

class AlbumForm extends Form {


    /**
     * AlbumForm constructor.
     */
    public function __construct($name = null) {
        parent::__construct('album');

        $this->add([
                       'name' => 'id',
                       'type' => 'Hidden'
                   ]);

        $this->add([
                       'name'    => 'title',
                       'type'    => 'Text',
                       'options' => [
                           'label' => 'Title'
                       ]
                   ]);

        $this->add([
                       'name'    => 'artist',
                       'type'    => 'Text',
                       'options' => [
                           'label' => 'Artist'
                       ]
                   ]);

        $this->add([
                       'name'       => 'submit',
                       'type'       => 'Submit',
                       'attributes' => [
                           'value' => 'Go',
                           'id'    => 'submitbutton'
                       ]
                   ]);
    }
}
