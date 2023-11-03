<?php

namespace Raid\Core\Model\Models;

use Illuminate\Database\Eloquent\Model;
use Raid\Core\Model\Models\Contracts\ModelInterface;
use Raid\Core\Model\Traits\Model\Associatable;
use Raid\Core\Model\Traits\Model\Attributable;
use Raid\Core\Model\Traits\Model\Bootable;
use Raid\Core\Model\Traits\Model\Changeable;
use Raid\Core\Model\Traits\Model\Filterable;
use Raid\Core\Model\Traits\Model\Observable;
use Raid\Core\Model\Traits\Model\Shareable;
use Raid\Core\Model\Traits\Model\WithAssociatable;

class MysqlModel extends Model implements ModelInterface
{
    use Associatable;
    use Attributable;
    use Bootable;
    use Changeable;
    use Filterable;
    use Observable;
    use Shareable;
    use WithAssociatable;

    /**
     * {@inheritdoc}
     */
    protected $fillable = [];
}
