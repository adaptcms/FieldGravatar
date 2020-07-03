<?php

namespace Adaptcms\FieldGravatar;

use Adaptcms\Base\Models\Package;

class FieldGravatar
{
  /**
  * On Install
  *
  * @return void
  */
  public function onInstall()
  {
    Package::syncPackageFolder(get_class());
  }
}
