{include file="header.tpl"}

<h1 class="title">Panel de administrador de reseñas</h1>
<h2>Haga click si desea eliminar una reseña</h2>
<ul>
    {foreach from=$reviews item=$review}
        <li><a href="warning/review/{$review->id_review}">{$review->review}</a></li>
    {/foreach}
</ul>

{include file="redirectHome.tpl"}
{include file="footer.tpl"}