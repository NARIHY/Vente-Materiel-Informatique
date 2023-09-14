<?php
namespace Nari\Interface;

interface TextInterface
{
    /**
     * help us to get one part of letters
     * @param string $content
     * @param int $limit
     * @author NARIHY <maheninarandrianarisoa@gmail.com>
     */
    public static function excerpt(string $content, int $limit = 300);
}
