<div class="star-rating">
  @if(Auth::user()->role == 'Murid')
  <fieldset onclick="rateIt('{{$user->id}}',this)" id="point">
    <input type="radio" id="star5" name="rating"  {{ $rate->point == 5 ? 'checked' : '' }} value="5" /><label for="star5" title="Outstanding">5 stars</label>
    <input type="radio" id="star4" name="rating" {{ $rate->point == 4 ? 'checked' : '' }}  value="4" /><label for="star4" title="Very Good">4 stars</label>
    <input type="radio" id="star3" name="rating" {{ $rate->point == 3 ? 'checked' : '' }} value="3" /><label for="star3" title="Good">3 stars</label>
    <input type="radio" id="star2" name="rating" {{ $rate->point == 2 ? 'checked' : '' }} value="2" /><label for="star2" title="Poor">2 stars</label>
    <input type="radio" id="star1" name="rating" {{ $rate->point == 1 ? 'checked' : '' }}  value="1" /><label for="star1" title="Very Poor">1 star</label>
  </fieldset>
  @endif
</div>
{{$avgrate}}
<br>