<?php

namespace TweakIt\Bundle\DoctrineDatagridBundle\Bridge\Doctrine\Helper;

class QueryBuilderHelper
{
    /**
     * 
     * @param \Doctrine\DBAL\Query\QueryBuilder $qb
     */
    public static function addLeftJoin($field, $alias, $qb)
    {
        $parts = $qb->getDQLParts()['join'];
        $exists = false;

        foreach ($parts as $joins) {
            foreach ($joins as $join) {
                foreach((array)$join as $key => $val){
                    if($val == $alias){
                        $exists = true;
                        break 3;
                    }
                }
            }
        }
              
        if(!$exists)
        {
            $qb->leftJoin($field, $alias);
        }
        return $qb;
    }
}
