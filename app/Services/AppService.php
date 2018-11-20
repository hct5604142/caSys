<?php

namespace App\Services;

use PhpParser\Node\Expr\Array_;

class AppService
{
    private $appRepository;

    public function __construct($appRepository)
    {
        $this->appRepository = $appRepository;
    }

    public function getClassifyName($id)
    {
        return $this->appRepository->getCrumbNameById($id);
    }

    public function getCrumbs($id)
    {
        $crumbs = [];
        $crumb = $this->appRepository->getCrumbById($id);
        $crumbs[$crumb->name] = $crumb->uri;
        while ($crumb->pid != null) {
            $crumb = $this->appRepository->getCrumbById($crumb->pid);
            $crumbs[$crumb->name] = $crumb->uri;
        }
        return json_encode($crumbs);

    }
}