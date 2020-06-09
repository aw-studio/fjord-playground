<?php

namespace FjordApp\Config;

use Fjord\Application\Navigation\Config;
use Fjord\Application\Navigation\Navigation;

class NavigationConfig extends Config
{
    /**
     * Topbar navigation entries.
     *
     * @param \Fjord\Application\Navigation\Navigation $nav
     * @return void
     */
    public function topbar(Navigation $nav)
    {
        $nav->section([
            $nav->preset('profile'),
        ]);

        $nav->section([
            $nav->title(__f('fj.user_administration')),

            $nav->preset('users'),
            $nav->preset('permissions')
        ]);

        $nav->section([
            $nav->preset('collections.settings', [
                'title' => __f('fj.settings'),
                'icon' => fa('cog')
            ])
        ]);
    }

    /**
     * Main navigation entries.
     *
     * @param \Fjord\Application\Navigation\Navigation $nav
     * @return void
     */
    public function main(Navigation $nav)
    {
        $nav->section([
            $nav->title('Forms'),

            $nav->group([
                'title' => 'Pages',
                'icon' => '<i class="fas fa-file"></i>',
            ], [
                $nav->preset('pages.home', [
                    'icon' => '<i class="fas fa-home">'
                ]),
            ])
        ]);

        $nav->section([
            $nav->title('Models'),

            $nav->preset('crud.employees', [
                'icon' => fa('users')
            ]),
            $nav->preset('crud.departments', [
                'icon' => fa('building')
            ]),
            $nav->preset('crud.projects', [
                'icon' => fa('project-diagram')
            ]),
        ]);

        $nav->section([
            $nav->title('Fields'),

            $nav->group([
                'title' => 'Fields',
                'icon' => fa('th'),
            ], [
                $nav->preset('fields.block', [
                    'icon' => fa('th-large')
                ]),
                $nav->preset('fields.boolean', [
                    'icon' => fa('toggle-on')
                ]),
                $nav->preset('fields.checkboxes', [
                    'icon' => fa('check-square')
                ]),
                $nav->preset('fields.code', [
                    'icon' => fa('code')
                ]),
                $nav->preset('fields.datetime', [
                    'icon' => fa('calendar-alt')
                ]),
                $nav->preset('fields.icon', [
                    'icon' => fa('grip-horizontal')
                ]),
                $nav->preset('fields.image', [
                    'icon' => fa('image')
                ]),
                $nav->preset('fields.input', [
                    'icon' => fa('font')
                ]),
                $nav->preset('fields.modal', [
                    'icon' => fa('window-maximize')
                ]),
                $nav->preset('fields.password', [
                    'icon' => fa('key')
                ]),
                $nav->preset('fields.range', [
                    'icon' => fa('sliders-h')
                ]),
                $nav->preset('fields.select', [
                    'icon' => fa('bars')
                ]),
                $nav->preset('fields.textarea', [
                    'icon' => fa('heading')
                ]),
                $nav->preset('fields.wysiwyg', [
                    'icon' => fa('file-word')
                ]),
            ]),
            $nav->group([
                'title' => 'Relations',
                'icon' => fa('list'),
            ], [
                $nav->preset('relations.one_relation', [
                    'icon' => fa('square')
                ]),
                $nav->preset('relations.many_relation', [
                    'icon' => fa('clone')
                ]),

            ])
        ]);

        $nav->section([
            $nav->title('Fjord'),

            $nav->preset('crud.developers', [
                'icon' => fa('users')
            ]),
        ]);
    }
}
