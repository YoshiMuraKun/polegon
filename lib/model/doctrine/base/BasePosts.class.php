<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Posts', 'doctrine');

/**
 * BasePosts
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $text
 * 
 * @method integer getId()   Returns the current record's "id" value
 * @method string  getText() Returns the current record's "text" value
 * @method Posts   setId()   Sets the current record's "id" value
 * @method Posts   setText() Sets the current record's "text" value
 * 
 * @package    MySite
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePosts extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('Posts');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('text', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}