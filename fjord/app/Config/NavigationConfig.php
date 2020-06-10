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

            $nav->preset('user.user', [
                'icon' => fa('users')
            ]),
            $nav->preset('permissions')
        ]);

        $nav->section([
            $nav->preset('form.collections.settings', [
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
            $nav->title('Fields'),

            $nav->group([
                'title' => 'Fields <span class="badge badge-success">New</span>',
                'icon' => fa('th'),
            ], [
                $nav->preset('form.fields.block', [
                    'icon' => fa('th-large')
                ]),
                $nav->preset('form.fields.boolean', [
                    'icon' => fa('toggle-on')
                ]),
                $nav->preset('form.fields.checkboxes', [
                    'icon' => fa('check-square')
                ]),
                $nav->preset('form.fields.code', [
                    'icon' => fa('code')
                ]),
                $nav->preset('form.fields.datetime', [
                    'icon' => fa('calendar-alt')
                ]),
                $nav->preset('form.fields.icon', [
                    'icon' => fa('grip-horizontal')
                ]),
                $nav->preset('form.fields.image', [
                    'icon' => fa('image')
                ]),
                $nav->preset('form.fields.input', [
                    'icon' => fa('font')
                ]),
                $nav->preset('form.fields.modal', [
                    'icon' => fa('window-maximize')
                ]),
                $nav->preset('form.fields.password', [
                    'icon' => fa('key')
                ]),
                $nav->preset('form.fields.range', [
                    'icon' => fa('sliders-h')
                ]),
                $nav->preset('form.fields.select', [
                    'icon' => fa('bars')
                ]),
                $nav->preset('form.fields.textarea', [
                    'icon' => fa('heading')
                ]),
                $nav->preset('form.fields.wysiwyg', [
                    'icon' => fa('file-word')
                ]),
            ]),
            $nav->group([
                'title' => 'Relations <span class="badge badge-success">New</span>',
                'icon' => fa('list'),
            ], [
                $nav->preset('form.relations.one_relation', [
                    'icon' => fa('square')
                ]),
                $nav->preset('form.relations.many_relation', [
                    'icon' => fa('clone')
                ]),

            ])
        ]);

        $nav->section([
            $nav->title('Forms'),

            $nav->group([
                'title' => 'Pages',
                'icon' => '<i class="fas fa-file"></i>',
            ], [
                $nav->preset('form.pages.home', [
                    'icon' => '<i class="fas fa-home">'
                ]),
            ]),

            $nav->title('Models'),

            $nav->preset('crud.employee', [
                'icon' => fa('users')
            ]),
            $nav->preset('crud.department', [
                'icon' => fa('building')
            ]),
            $nav->preset('crud.project', [
                'icon' => fa('project-diagram')
            ]),
        ]);

        $nav->section([
            $nav->title('Fjord'),

            $nav->preset('crud.developer', [
                'icon' => fa('users')
            ]),
        ]);
    }
}
