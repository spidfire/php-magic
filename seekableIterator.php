<?php

// SeekableIterator extends Iterator
// https://www.php.net/manual/en/class.seekableiterator.php
// https://www.php.net/manual/en/class.iterator.php

// Other: https://www.php.net/manual/en/class.outeriterator.php, https://www.php.net/manual/en/class.recursiveiterator.php
// All iterators: https://www.php.net/manual/en/spl.iterators.php
class MagicArraySeekable implements SeekableIterator{

    private $index = 0;
    private $contents = ['Try','not.','Do','or','do','not.','There','is','no','try.'];


    public function current()
    {
        return $this->contents[$this->index];
    }

    public function next()
    {
        $this->index++;
    }

    public function key()
    {
        return $this->index;
    }

    public function valid()
    {
        return isset($this->contents[$this->index]);
    }

    public function rewind()
    {
        $this->index = 0;
    }

    // Addition of the SeekableIterator
    public function seek($offset)
    {
        $this->index = $offset;
    }
}

$array = new MagicArraySeekable();
foreach($array as $key => $item){
    echo "$key: $item, ";
}

echo "\nManual way!\n";
$array->rewind();

// works under the hood like

while($array->valid()){
    echo "{$array->key()}: {$array->current()}, ";
    $array->next();
}



