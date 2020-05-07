<div class="slider">
	<ul class="slides">
		@foreach($slides as $slide)
		<li onclick="window.location='{{ $slide->link }}'">
			<img src="{{ asset($slide->imagem) }}" alt="Imagem">
			<div class="caption {{ $direcaoSlide[rand(0, 2)] }}">
				<h3>{{ $slide->titulo }}</h3>
				<h5>{{ $slide->descricao }}</h5>
				@if($slide->link != null)
					<a href="{{ $slide->link }}" class="btn blue-grey lighten-2" style="width:140px">mais...</a>
				@endif
			</div>
		</li>
		@endforeach
	</ul>
</div>