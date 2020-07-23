<?php

namespace Adaptcms\FieldGravatar\Field;

use Adaptcms\Base\Traits\EmptyColumnMigrations;
use Adaptcms\Fields\FieldType;

class FieldGravatar extends FieldType
{
  use EmptyColumnMigrations;

  /**
  * @var array
  */
  public $defaultSettings = [
    'options' => [
      'is_sortable'        => false,
      'is_searchable'      => false,
      'is_required_create' => false,
      'is_required_edit'   => false
    ],
    'action_rules' => [
      'index'  => true,
      'create' => false,
      'edit'   => false,
      'show'   => true,
      'search' => true
    ]
  ];

  /**
  * @var boolean
  */
  public $shouldNotSetData = true;

  /**
  * Create Field Rules
  *
  * @return array
  */
  public function createFieldRules()
  {
    return [
      'meta.emailField' => 'required'
    ];
  }
}
