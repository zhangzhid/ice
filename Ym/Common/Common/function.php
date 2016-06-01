<?php


/**
 * size的换算
 * @param $number
 * @return string
 */
function conversion($number)
{
    $num = strlen($number);
    if ($num > 9) {
        $num = $num - 9;
        return  substr($number,0,$num)."GB";
    } elseif ($num > 6) {
        $num = $num - 6;
        return substr($number,0,$num)."MB";
    } elseif ($num > 3) {
        $num = $num -3;
        return substr($number,0,$num)."KB";
    } else {
        return $number."B";
    }
}

/**
 * 显示距离当前时间的字符串
 * @param $time 时间戳
 * @return string
 */
function tranTime($time)
{
    $rtime = date("m月d日 H分i秒",$time);
    $htime = date("H分i秒",$time);

    $time = time() - $time;

    if ($time < 60)
    {
        $str = '刚刚';
    }
    elseif ($time < 60 * 60)
    {
        $min = floor($time/60);
        $str = $min.'分钟前';
    }
    elseif ($time < 60 * 60 * 24)
    {
        $h = floor($time/(60*60));
        $str = $h.'小时前 '.$htime;
    }
    elseif ($time < 60 * 60 * 24 * 3)
    {
        $d = floor($time/(60*60*24));
        if($d==1)
            $str = '昨天 '.$rtime;
        else
            $str = '前天 '.$rtime;
    }
    else
    {
        $str = $rtime;
    }
    return $str;
}



/**
 * 返回配置项对应值
 * @param string|integer $field 标识名,标识为空则返回所有配置项数组
 * @param string|integer $config_type 配置类型
 * @return string
 */
function get_config_value($field = '', $type = 'site') {
    $Config = M('Config');
    if ($field) {
        $value = $Config->where(array('status' => 1, 'field' => $field))->getField('value');
        return $value;
    } else {
        $config_list = $Config->where(array('status' => 1, 'config_type' => $type))->order('sort ASC')->select();
        return $config_list;
    }

}

//文件上传方法
/*$buttonname:上传按钮name,*/
function upload($buttonname,$updir,$twidth,$theight) {
    $tmp_name=$_FILES[$buttonname]['tmp_name'];
    if(file_exists($tmp_name)){
        import('ORG.Net.UploadFile');
        // 实例化上传类
        $upload = new UploadFile();
        // 设置附件上传大小
        $upload->maxSize  = 3145728 ;
        // 设置附件上传类型
        $upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');
        // 设置附件上传目录
        $uploaddir=$upload->savePath =  './Uploads/'.$updir.'/';
        //开启缩略图
        $upload->thumb=ture;
        $upload->thumbMaxWidth=$twidth;
        $upload->thumbMaxHeight=$theight;
        if(!$upload->upload()) {// 上传错误提示错误信息
            $this->error($upload->getErrorMsg());
        }else{// 上传成功 获取上传文件信息
            $info =  $upload->getUploadFileInfo();
            $url=$uploaddir.$info[0]['savename'];
            $url=ltrim($url,'./');
            return $url;
        }
    }

}


function get_list($model, $order='sort desc')
{
    $Model = M($model);
    $model_list = $Model->where(array('status' => 1))->order($order)->select();
    return $model_list;

}


//获取标题
function get_title($model, $id)
{
    $title = M($model)->where(array('id' => $id))->getField('title');
    return $title;
}


//检测标题是否存在
function check_title($model, $title)
{
    $info = M($model)->where(array('title' => $title))->find($id);
    if($info){
        return true;
    }else{
        return false;
    }
}

//获取
function get_type_title($goods_id)
{
    $type_list = get_type_list($goods_id);
    if($type_list){
        $type_title = '';
        foreach ($type_list as $v){
            $v = (int)$v;
            if(!$v) {
                continue;
            }
            $type_title .= get_title('type', $v);
            $type_title = $type_title.',';
        }
    }else{
        $type_title = '';
    }

    return trim($type_title, ',');

}

function get_em()
{
    $Model = M('em');
    $emz = $Model->where(array('id' => 1))->find();
    return $emz;

}

