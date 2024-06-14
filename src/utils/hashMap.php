<?php
/**
 * JavaのHashMapっぽいクラス
 * <code>
 * $map = new HashMap();
 * $map->put('foo', 'bar');
 * $map->get('foo'); // bar
 * </code>
**/
class HashMap extends ArrayObject {
    /**
     * コンストラクタ
     *
     * @param array $array
     */
    public function __construct($array = array()) {
        parent::__construct($array, ArrayObject::ARRAY_AS_PROPS);
    }
    /**
     * マップが指定のキーのマッピングを保持する場合に true を返します
     *
     * @param  integer|string $key
     * @return boolean
     */
    public function containsKey($key) {
        return parent::offsetExists($key);
    }
    /**
     * マップが 1 つまたは複数のキーと指定された値をマッピングしている場合に true を返します
     *
     * @param  mixed $value
     * @return boolean
     */
    public function containsValue($value) {
        foreach ($this as $k => $v) {
            if ($value === $v) {
                return true;
            }
        }
        return false;
    }
    /**
     * 指定されたキーがマップされている値を返します
     *
     * @param  integer|string $key
     * @return mixed
     */
    public function get($key) {
        return parent::offsetGet($key);
    }
    /**
     * 指定された値と指定されたキーをこのマップに関連付けます
     * @param  integer|string $key
     * @param  mixed          $value
     * @return void
     */
    public function put($key = null, $value = null) {
        if ($value === null) {
            return;
        }
        if ($key === null) {
            parent::append($value);
            return;
        }
        parent::offsetSet($key, $value);
    }
    /**
     * 指定されたマップからすべてのマッピングをマップにコピーします
     *
     * @param ArrayObject $map
     */
    public function putAll(ArrayObject $map) {
        $i = $map->getIterator();
        foreach ($i as $k => $v) {
            $this->put($k, $v);
        }
    }
    /**
     * マップがキーと値のマッピングを保持しない場合に true を返します
     *
     * @return boolean
     */
    public function isEmpty() {
        return parent::count() === 0 ? true : false;
    }
    /**
     * 指定されたキーのマッピングがあればマップから削除します
     *
     * @param <type> $key
     */
    public function remove($key) {
        parent::offsetUnset($key);
    }
    /**
     * マップ内のキー値マッピングの数を返します
     *
     * @return integer
     */
    public function size() {
        return parent::count();
    }
    /**
     * このマップに含まれるマップの Iterator ビューを返します
     * 
     * @return ArrayIterator
     */
    public function entrySet() {
        return parent::getIterator();
    }
    /**
     * このマップに含まれるキーの Iterator ビューを返します
     *
     * @return ArrayIterator
     */
    public function keySet() {
        $a = array();
        foreach ($this as $k => $v) {
            $a[] = $k;
        }
        return new ArrayIterator($a);
    }
    /**
     * このマップに含まれるマップの Iterator ビューを返します
     * 
     * @return ArrayIterator
     */
    public function values() {
        $a = array();
        foreach ($this as $k => $v) {
            $a[] = $v;
        }
        return new ArrayIterator($a);
    }
}