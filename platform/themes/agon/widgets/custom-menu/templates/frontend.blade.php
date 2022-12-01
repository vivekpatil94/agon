<div class="col-lg-3 @if ($config['size'] == 'small') width-16 @else width-20 mb-30 @endif">
    <h4 class="text-heading-5">{!! BaseHelper::clean($config['name']) !!}</h4>
    {!!
        Menu::generateMenu([
            'slug'    => $config['menu_id'],
            'view'    => 'footer-menu',
            'options' => ['class' => 'menu-footer mt-20'],
        ])
    !!}
</div>
