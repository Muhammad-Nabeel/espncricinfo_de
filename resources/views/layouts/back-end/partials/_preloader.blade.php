<div id="loading" class="d--none">
    <center>
    <img width="150"
            src="{{asset('/assets/front-end/img/loader.gif')}}"
            onerror="this.src='{{asset('/assets/front-end/img/loader.gif')}}'">
    </center>
</div>

<style>

#loading {
	position: fixed;
	left: 0;
	right: 0;
	top: 45%;
	bottom: 0;
	z-index: 999999;
}

.d--none{
    display:none;
}

#loading img{
    border-radius: 50px;
}
</style>