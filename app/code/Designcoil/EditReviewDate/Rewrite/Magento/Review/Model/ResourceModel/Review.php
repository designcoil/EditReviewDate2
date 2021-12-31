<?php

namespace Designcoil\EditReviewDate\Rewrite\Magento\Review\Model\ResourceModel;

use Magento\Framework\Model\AbstractModel;

class Review extends \Magento\Review\Model\ResourceModel\Review
{
    /**
     * Perform actions before object save
     *
     * @param AbstractModel $object
     * @return \Magento\Review\Model\ResourceModel\Review
     */
    protected function _beforeSave(AbstractModel $object)
    {
        if ($object->getId()) {
            if ($date = $object->getCreatedAt()) {
                $object->setCreatedAt($this->_date->date(null,(strtotime($date)+abs($this->_date->getGmtOffset()))));
            } else {
                $object->setCreatedAt(null);
            }
        }

        parent::_beforeSave($object);
    }
}
