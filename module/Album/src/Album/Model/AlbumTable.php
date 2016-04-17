<?php namespace Album\Model;

use Zend\Db\TableGateway\TableGateway;

/**
 * Class AlbumTable
 *
 * @package Album\Model
 */
class AlbumTable {

    /** @var \Zend\Db\TableGateway\TableGateway $tableGateway */
    protected $tableGateway;

    /**
     * AlbumTable constructor.
     *
     * @param \Zend\Db\TableGateway\TableGateway $tableGateway
     */
    public function __construct(TableGateway $tableGateway) {
        $this->tableGateway = $tableGateway;
    }

    /**
     * @return \Zend\Db\ResultSet\ResultSet
     */
    public function fetchAll() {
        return $this->tableGateway->select(function($select) {
            $select->order('title ASC');
        });
    }

    public function getAlbum($id) {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(['id' => $id]);
        $row = $rowset->current();

        if (!$row) {
            throw new \Exception('Couldn\'t find row ' . $id);
        }

        return $row;
    }

    public function saveAlbum(Album $album) {
        $data = [
            'artist' => $album->artist,
            'title' => $album->title,
            'lastupdate' => date(DATE_RFC3339)
        ];

        $id = (int) $album->id;

        if($id === 0) {
            $this->tableGateway->insert($data);
        } else {
            if($this->getAlbum($id)) {
                $this->tableGateway->update($data, ['id' => $id]);
            } else {
                throw new \Exception('Album doesn\t exist');
            }
        }
    }

    public function deleteAlbum($id) {
        $this->tableGateway->delete(['id' => (int) $id]);
    }

}