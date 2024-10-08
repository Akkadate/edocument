<?php
/**
 * @filesource modules/edocument/models/report.php
 *
 * @copyright 2016 Goragod.com
 * @license https://www.kotchasan.com/license/
 *
 * @see https://www.kotchasan.com/
 */

namespace Edocument\Report;

/**
 * module=edocument-report
 *
 * @author Goragod Wiriya <admin@goragod.com>
 *
 * @since 1.0
 */
class Model extends \Kotchasan\Model
{
    /**
     * อ่านข้อมูลที่เลือก
     *
     * @param int $document_id ID
     *
     * @return object|null คืนค่าข้อมูล object ไม่พบคืนค่า null
     */
    public static function get($document_id)
    {
        return static::createQuery()
            ->from('edocument')
            ->where(['id', $document_id])
            ->first();
    }

    /**
     * อ่านข้อมูลประวัติการดาวน์โหลดใส่ลงในตาราง
     *
     * @param int $id ID
     *
     * @return \Kotchasan\Database\QueryBuilder
     */
    public static function toDataTable($id)
    {
        return static::createQuery()
            ->select('U.name', 'U.username', 'D.department_id', 'D.last_update', 'D.downloads')
            ->from('edocument_download D')
            ->join('user U', 'LEFT', ['U.id', 'D.member_id'])
            ->where(['D.document_id', $id]);
    }
}
