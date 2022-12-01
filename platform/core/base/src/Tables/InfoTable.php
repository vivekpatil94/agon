<?php

namespace Botble\Base\Tables;

use Botble\Base\Supports\SystemManagement;
use Botble\Table\Abstracts\TableAbstract;
use Illuminate\Support\Collection;

class InfoTable extends TableAbstract
{
    /**
     * @var string
     */
    protected $view = 'core/table::simple-table';

    /**
     * @var bool
     */
    protected $hasCheckbox = false;

    /**
     * @var bool
     */
    protected $hasOperations = false;

    /**
     * {@inheritDoc}
     */
    public function ajax()
    {
        return $this->toJson($this->table
            ->of($this->query())
            ->editColumn('name', function ($item) {
                return view('core/base::system.partials.info-package-line', compact('item'))->render();
            })
            ->editColumn('dependencies', function ($item) {
                return view('core/base::system.partials.info-dependencies-line', compact('item'))->render();
            }));
    }

    /**
     * @return Collection
     */
    public function query(): Collection
    {
        $composerArray = SystemManagement::getComposerArray();
        $packages = SystemManagement::getPackagesAndDependencies($composerArray['require']);

        return collect($packages);
    }

    /**
     * {@inheritDoc}
     */
    public function columns(): array
    {
        return [
            'name' => [
                'name' => 'name',
                'title' => trans('core/base::system.package_name') . ' : ' . trans('core/base::system.version'),
                'class' => 'text-start',
            ],
            'dependencies' => [
                'name' => 'dependencies',
                'title' => trans('core/base::system.dependency_name') . ' : ' . trans('core/base::system.version'),
                'class' => 'text-start',
            ],
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function getBuilderParameters(): array
    {
        return [
            'stateSave' => true,
        ];
    }

    /**
     * {@inheritDoc}
     */
    protected function getDom(): ?string
    {
        return "rt<'datatables__info_wrap'pli<'clearfix'>>";
    }
}
