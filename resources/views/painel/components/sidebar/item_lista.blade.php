@if (isset($itemLista['url']) && array_key_exists('url', $itemLista) && $itemLista['url'] != '')
    <li class="c-white link-sidebar <?php if(isset($pagina) && $pagina == $itemLista['slug']) : echo 'active'; endif ;?>">
        <a href="{{route($itemLista['url'])}}">
            <div class="auxiliar">
                <?php echo $itemLista['icon'];?>
            </div>
            <p class="t-link">{{$itemLista['nome']}}</p>
        </a>
    </li>
    @else
    <li class="c-white link-sidebar <?php if(isset($pagina) && $pagina == $itemLista['slug']) : echo 'active'; endif ;?>">
        <button class="accordion-button {{isset($pagina) && $pagina == $itemLista['slug'] ? '' : 'collapsed'}}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$itemLista['slug']}}" aria-expanded="{{isset($pagina) && $pagina == $itemLista['slug'] ? 'false' : 'true'}}" aria-controls="collapse{{$itemLista['slug']}}">
            <div class="auxiliar">
                <?php echo $itemLista['icon'];?>
            </div>
            <p class="t-link">{{$itemLista['nome']}}</p>
        </button>
    </li>
    <div class="accordion-item">
        <div id="collapse{{$itemLista['slug']}}" class="accordion-collapse collapse {{isset($pagina) && $pagina == $itemLista['slug'] ? 'show' : ''}}" aria-labelledby="heading{{$itemLista['slug']}}" data-bs-parent=".sidebar-accordion">
            <div class="accordion-body">
                <ul>
                    @foreach ($itemLista['itensAccordion'] as $item)
                        <li class="c-white link-sidebar <?php if(isset($subpagina) && $subpagina == $item['slug']) : echo 'active'; endif ;?>">
                            <a href="{{ route($item['url'])}}">
                                <div class="auxiliar">
                                    <i class="fas fa-circle"></i>
                                </div>
                                <p class="t-link">{{$item['nome']}}</p>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif