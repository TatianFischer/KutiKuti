$(function(){
  var pageHeight = $(document.documentElement).height();
  //console.log(pageHeight);
  var pageWidth = $(document.documentElement).width();
  //console.log(pageWidth);

  for(i = 0; i < 15 ; i++){
    // On tire aléatoirement une image
    var numeroImage = Math.ceil(Math.random()*5);

    // On détermine aléatoirement sa position
      // 12.5 -> image de 25px*25px
    var randomTop = (Math.floor((Math.random()*(pageHeight - 25))+12.5) / pageHeight) * 100;
    var randomLeft = (Math.floor((Math.random()*(pageWidth - 25))+12.5) / pageWidth) * 100;

    $('<img>')
      .attr({'src' : 'img/aleatoire/kuti'+numeroImage+'.png', 'alt' : 'petit carré'})
      .addClass('aleatoire')
      .css({'position' : 'absolute', 'z-index' : 1, 'top' : randomTop+'%', 'left' : randomLeft+'%'})
        .appendTo('.content');
  }
});