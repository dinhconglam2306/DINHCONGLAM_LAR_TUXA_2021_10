<?php

namespace App\Models;

use App\Models\AdminModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class SettingModel extends AdminModel
{
    public function __construct()
    {
        $this->table               = 'setting';
        $this->folderUpload        = 'setting';
        $this->fieldSearchAccepted = ['id', 'name', 'description', 'link'];
        $this->crudNotAccepted     = ['_token', 'id'];
    }

    public function listItems($params = null, $options = null)
    {

        $result = null;

        if ($options['task'] == "admin-list-items") {
            $query = $this->select('id', 'name', 'ordering', 'description', 'status', 'link', 'thumb', 'created', 'created_by', 'modified', 'modified_by');

            if ($params['filter']['status'] !== "all") {
                $query->where('status', '=', $params['filter']['status']);
            }

            if ($params['search']['value'] !== "") {
                if ($params['search']['field'] == "all") {
                    $query->where(function ($query) use ($params) {
                        foreach ($this->fieldSearchAccepted as $column) {
                            $query->orWhere($column, 'LIKE',  "%{$params['search']['value']}%");
                        }
                    });
                } else if (in_array($params['search']['field'], $this->fieldSearchAccepted)) {
                    $query->where($params['search']['field'], 'LIKE',  "%{$params['search']['value']}%");
                }
            }

            $result =  $query->orderBy('id', 'desc')
                ->paginate($params['pagination']['totalItemsPerPage']);
        }

        if ($options['task'] == 'news-list-items') {
            $query = $this->select('id', 'name', 'description', 'link', 'thumb')
                ->where('status', '=', 'active')
                ->limit(5);

            $result = $query->get()->toArray();
        }

        

        return $result;
    }

    

    public function getItem($params = null, $options = null)
    {
        $result = null;

        if ($options['task'] == 'get-item') {
            $result = self::select('id', 'name', 'ordering', 'description', 'status', 'link', 'thumb')->where('id', $params['id'])->first();
        }

        if ($options['task'] == 'get-thumb') {
            $result = self::select('id', 'thumb')->where('id', $params['id'])->first();
        }

        if($options['task'] == 'setting-general'){
            $result = self::select('value')->where('key_value', 'setting_general')->first();
            $result = json_decode($result['value'],true);

            // $result = json_decode(json_encode($query),true);
            // $result = gettype($query);
            // $result = var_dump(json_decode($query));
            // $result = json_decode($query,true)['value'];
            // $result = explode(',"', $result);
        
        }

        return $result;
    }

    public function saveItem($params = null, $options = null)
    {
        if ($options['task'] == 'setting-general') {
            $params = json_encode($params,JSON_UNESCAPED_UNICODE);
            self::where('key_value', 'setting_general')->update(['value' => $params ]);
        }
    }
    
}