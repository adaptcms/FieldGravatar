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
}
