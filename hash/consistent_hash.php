<?php
/******************************************************
 * A implementation of consistent hashing
 *****************************************************/
class CHASH {
        private		$nodes;		//aaray
        private		$pos;		//array
        private		$ok;		//bool

        private		$ptr;

        /**
         * Constructor
         * @param Array $config array of candiddate nodes, unrelated with elements' order
         * @param int $replics of a real node
         */
        function __construct($config, $replics=503)
        {
                $this->ptr = -1;
                $this->pos = array();

                $this->nodes = $config;
                $this->ok = true;

                if ($replics < 1) $this->ok = false;

                if (empty($config) || !is_array($config) || count($config) < 1)
                        $this->ok = false;

                foreach ($config as $k => $v) {
                        for ($i=0; $i<$replics; $i++) {

                                $str = $v.":".$i;
                                $hash = $this->_hash($str);

	                        $switch = 0;
	                        if ($switch){
		                        printf("\nk: %s\nv: %s\ni: %s", $k, $v, $i);
		                        printf("\nstr: %s", $str);
					printf("\nhash %d: %s\n\n", $i, $hash);
	                        }

	                        $this->pos[$hash] = $k;

                        }
                }

                ksort($this->pos, SORT_NUMERIC);
        }

        function __destruct()
        {
                unset($this->nodes);
                unset($this->pos);
                unset($this->ok);
        }

        /**
         * get the first node by key
         * @param string $key
         * @return mix real node
         */
        function get_node($key)
        {
                if (!$this->ok) return false;

                $hash = $this->_hash($key);
                $this->ptr = $pos = $this->_find_pos($hash);

                return $this->nodes[$this->pos[$pos]];
        }

        function get_nodes($key, $n)
        {
                if (!$this->ok) return false;
                if ($n > count($this->nodes)) return false;
                //echo "key: $key\n";

                $tmp = array();

                $pos = $this->_hash($key);

                while ($n) {
                        $pos = $this->_find_pos($pos);
                        echo "pos: $pos\t";
                        echo "pos[pos]:".$this->pos[$pos]."\n";
                        if (in_array($this->pos[$pos], $tmp)) {
                                $pos += 1;
                                continue;
                        }
                        array_push($tmp, $this->pos[$pos]);
                        $n--;
                        $this->ptr = $pos;
                        $pos += 1;
                }
                //echo "tmp: ";print_r($tmp);
                $res = array();
                foreach ($tmp as $pos) {
                        array_push($res, $this->nodes[$pos]);
                }

                return $res;
        }

        /**
         * get the substitute node
         * @return mix real node
         */
        function next_node()
        {
                if (!$this->ok) return false;
                if ($this->ptr == -1) return false;

                $pos = $this->ptr;
                do {
                        $pos = $this->_find_pos($pos+1);
                } while ($this->pos[$pos] == $this->pos[$this->ptr]);

                $this->ptr = $pos;
                return $this->nodes[$this->pos[$pos]];

        }

        function _find_pos($hash)
        {
                foreach ($this->pos as $k => $v) {
                        if ($k >= $hash) return $k;
                }

                foreach ($this->pos as $k => $v) {
                        return $k;
                }

                //never to here
                return 0;
        }

        function _hash($str)
        {
                $hash_v = (crc32($str) & 0x7fffffff) % 50119;
                //echo "_hash str: $str\thash_v: $hash_v\n";
                return $hash_v;
        }
}
