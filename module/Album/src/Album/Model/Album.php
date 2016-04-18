<?php namespace Album\Model;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterInterface;
use Zend\Stdlib\ArrayObject;

class Album extends ArrayObject {

    /**
     * @var $id Int
     */
    public $id;

    /**
     * @var $artist Int
     */
    public $artist;

    /**
     * @var $title Int
     */
    public $title;

    /**
     * @var $inputFilter InputFilterInterface
     */
    protected $inputFilter;


    /**
     * @param $data
     *
     * @return array|void
     */
    public function exchangeArray($data) {
        parent::exchangeArray($data);

        foreach (['id', 'artist', 'title', 'lastupdate'] as $name) {
            $this->$name = (!empty($data[ $name ]) ? $data[ $name ] : null);
        }
    }

    public function setInputFilter(InputFilterInterface $inputFilter) {
        throw new \Exception("Not used");
    }

    public function getInputFilter() {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();

            $inputFilter->add([
                                  'name'     => 'id',
                                  'required' => true,
                                  'filters'  => [
                                      ['name' => 'Int']
                                  ]
                              ]);

            $inputFilter->add([
                                  'name'       => 'artist',
                                  'required'   => true,
                                  'filters'    => [
                                      ['name' => 'StripTags'],
                                      ['name' => 'StringTrim']
                                  ],
                                  'validators' => [
                                      [
                                          'name'    => 'StringLength',
                                          'options' => [
                                              'encoding' => 'UTF-8',
                                              'min'      => 1,
                                              'max'      => 100
                                          ]
                                      ]
                                  ]
                              ]);

            $inputFilter->add([
                                  'name'       => 'title',
                                  'required'   => true,
                                  'filters'    => [
                                      ['name' => 'StripTags'],
                                      ['name' => 'StringTrim']
                                  ],
                                  'validators' => [
                                      [
                                          'name'    => 'StringLength',
                                          'options' => [
                                              'encoding' => 'UTF-8',
                                              'min'      => 1,
                                              'max'      => 100
                                          ]
                                      ]
                                  ]
                              ]);

            $this->inputFilter = $inputFilter;

        }

        return $this->inputFilter;
    }

}