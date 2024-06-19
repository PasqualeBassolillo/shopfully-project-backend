<?php

namespace App\Repositories;
use League\Csv\Reader;
use League\Csv\Statement;

abstract class CsvRepository
{
    /**
     * Reader
     *
     * @var string
     */
    protected $csv = null;


    /**
     * fileName
     *
     * @var string
     */
    protected $fileName = null;


    /**
     * whereCallable
     *
     * @var array
     */
    protected $whereCallable = [];

    public function __construct () 
    {  
        $records = $this->getFile();
    }

    /**
     * Get file
     * 
     * Check the connection
     * 
     */
    public function getFile()
    {
        try {
            $this->csv = Reader::createFromPath(resource_path() . '/csv/' . $this->fileName . '.csv', 'r');
            $this->csv->setHeaderOffset(0);

            return $this->csv;
        } catch (Exception $e) {
            Log::error('Error reading CSV file: ' . $e->getMessage());

            return null;
        }
    }

    /**
     * Get data
     * 
     * Get all data
     * 
     * @param int $offset
     * @param int $limit
     * 
     * @return array
     */
    public function getData (int $offset = 0, int $limit = 100) {
        try {
            $csv = $this->getFile();

            $csv->setHeaderOffset(0);
    
            $records = Statement::create()
                            ->offset($offset)
                            ->limit($limit)
                            ;
    
            foreach ($this->whereCallable as $callable) {
                $records = $records->where($callable);
            }
    
            $results = $records->process($csv);
    
            return iterator_to_array($results, false);
        } catch (Exception $e) {
            Log::error('Error getting data from CSV file: ' . $e->getMessage());
            return [];
        }
        
    }

    /**
     * Set where callable
     * 
     * Get all callable to apply Statement
     * 
     * @param array $callback 
     * 
     * @return array
     */
    public function setWhereCallable (callable $callback) {
        if (!is_callable($callback)) {
            throw new Exception("\$callback is not a callable.");
        }

        $this->whereCallable [] = $callback;
    }

    /**
     * Find a flyer by its ID.
     *
     * @param  int  $id
     * @return array|null
     */
    public function find($id)
    {
        try {
            $csv = $this->getFile();
            $csv->setHeaderOffset(0);

            $records = Statement::create()
                                ->where(function ($record) use ($id) {
                                    return $record['id'] == $id;
                                })
                                ->process($csv);

            $result = iterator_to_array($records, false);

            return !empty($result) ? $result[0] : null;
        } catch (Exception $e) {
            Log::error('Error finding flyer by ID: ' . $e->getMessage());
            return null;
        }
    }
}
