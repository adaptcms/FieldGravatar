<?php

namespace Adaptcms\FieldGravatar\Field;

use Adaptcms\Base\Traits\EmptyColumnMigrations;
use Adaptcms\Fields\FieldType;

class FieldGravatar extends FieldType
{
  use EmptyColumnMigrations;

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
