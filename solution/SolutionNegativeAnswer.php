<?php

namespace Solution;

/**
 * Class SolutionNegativeAnswer
 * @package Solution
 */
class SolutionNegativeAnswer
{
    /**
     * @param string $string
     * @return array
     */
    public function transformString(string $string)
    {
        $explode = explode(',', $string);

        $nameAndCountOfNegativeAnswers = [];
        $temp = array_map(function($el) {
            return [
                'name' => preg_replace('/[:]+[A-Z]{0,}/','', $el) ,
                'answer'=> preg_replace('/^[A-Za-z\s]+[:]/','', $el),
                'negativeAnswer' => preg_replace('/^[A-Za-z\s]+[:]/','', $el) != "" ? substr_count(preg_replace('/^[A-Za-z\s]+[:]/','', $el), 'N') : ""
            ];
        },$explode);

        foreach ($temp as $students => $studentAnswer) {
            $nameAndCountOfNegativeAnswers[$studentAnswer['name']] = $studentAnswer['negativeAnswer'];

        }

        return $nameAndCountOfNegativeAnswers;

    }

    /**
     * @param array $array
     * @return array
     */
    public function firstAndSecondName(array $array)
    {
        $names = [];
        foreach ($array as $firstAndSecond => $value) {
            $names [] =[
                'firstName' => preg_replace('/\s[A-Za-z]+/', '',$value['name']),
                'lastName' => preg_replace('/^[A-Za-z]+[\s]/', '', $value['name']),
                'scores' => $value['scores']
            ];
        }
        return $names;
    }


    /**
     * @param array $data
     * @return array
     */
    public function sortNames(array $data)
    {
        usort($data, function($a, $b) {//var_dump(strcmp($b['firstName'] , $a['firstName']));die;
            return strcmp($a['firstName'] , $b['firstName']);
        });

        return $data;

    }

    /**
     * @param array $array
     * @return array
     */
    public function findDuplicates(array $array)
    {
        $duplicates = [];

        foreach (array_count_values($array) as $dupl => $count) {
            if ($count > 1) {
                foreach ($array as $name => $duplicateValue) {
                    if ($array[$name] == $dupl) {
                        $duplicates[] = ['name' => $name, 'scores' => $dupl];
                    }
                }
            }
        }

        return $this->firstAndSecondName($duplicates);
    }

    /**
     * @param $array
     * @return mixed
     */
    public function whoNeedsHelp($array)
    {
        $max = 0;
        $needsHelpName = '';
        foreach ($array as $name => $negativeAnswer) {
            if ($negativeAnswer === "") { var_dump($negativeAnswer);
                $needsHelpName = $name;
                break;
            } else {
                if ($negativeAnswer > $max) {
                    $max = $array[$name];
                    $needsHelpName = $name;
                }
            }
            if (!empty($this->findDuplicates($array))) {
                foreach ($this->findDuplicates($array) as $scores) {
                    if ($negativeAnswer !== "") {
                        $needsHelpName = $this->sortNames($this->findDuplicates($array))[0]['firstName'];
                    }
                }
            }
        }
        return $needsHelpName;

    }

}