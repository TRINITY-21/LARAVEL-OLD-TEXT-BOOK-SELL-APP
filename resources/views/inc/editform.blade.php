<div class="form-group">
        {{Form::label('title', 'Title of book',['class' => 'text-dark'])}}
        {{Form::text('title', $book->title, ['class' => 'form-control', 'placeholder' => 'Title of book'])}}
     </div>

     <div class="form-group">
        {{Form::label('description', 'Description',['class' => 'text-dark'])}}
        {{Form::textarea('description',$book->description, ['id' => 'article-ckeditor','class' => 'form-control', 'placeholder' => 'Description'])}}
     </div>

     <div class="form-group">
            {{Form::label('image','Image of book',['class' => 'text-dark'])}}
            <br>
            {{Form::file('image')}}
         </div>

     <div class="form-group">
            {{Form::label('author', 'Please specify the author',['class' => 'text-dark'])}}
            {{Form::text('author',$book->author, ['class' => 'form-control', 'placeholder' => 'Author'])}}
     </div>

     <div class="form-group">
            {{Form::label('quantity', 'Please specify the quantity',['class' => 'text-dark'])}}
            {{Form::text('quantity',$book->quantity, ['class' => 'form-control', 'placeholder' => 'Quantity'])}}
     </div>

     <div class="form-group">
                {{Form::label('category', 'Please specify the category',['class' => 'text-dark'])}}
                <select class="form-control" name="category_id">
                        <option disabled selected value> -- select an option -- </option>
                    @foreach($categories as $category)
                        <option value={{$category->id}}>{{$category->name}}</option>
                    @endforeach
                </select>
      </div>

      <div class="form-group">
            {{Form::label('location', 'Please specify the item location',['class' => 'text-dark'])}}
            {{Form::text('location',$book->location, ['class' => 'form-control', 'placeholder' => 'Uenr Hostel, Domain Hostel'])}}
     </div>

     <div class="form-group">
        {{Form::label('publishedOn', 'Publication Date',['class' => 'text-dark'])}}
        {{Form::date('publishedOn',$book->publishedOn, ['class' => 'form-control', 'placeholder' => 'Event Date', 'onkeydown' => 'return false', 'id' => 'datepicker'])}}
     </div>

     <div class="form-group">
            {{Form::label('price', 'Price of Book',['class' => 'text-dark'])}}
            {{Form::text('price', $book->price, ['class' => 'form-control', 'placeholder' => 'GHC'])}}
     </div>

     <div class="form-group">
            {{Form::label('type', 'Please specify the book type',['class' => 'text-dark'])}}
            {{Form::text('type', $book->type, ['class' => 'form-control', 'placeholder' => 'Eg. Engineering,Chemistry,Natural Resources'])}}
     </div>

    <div class="form-group">
            {{Form::label('contact', 'Contact Number',['class' => 'text-dark'])}}
            {{Form::number('contact', $book->type, ['class' => 'form-control', 'placeholder' => 'Contact'])}}
     </div>

     <div class="form-group">
            {{Form::label('ISBN', "Please specify the book's ISBN number(Optional)",['class' => 'text-dark'])}}
            {{Form::text('ISBN', $book->ISBN, ['class' => 'form-control', 'placeholder' => 'ISBN'])}}
     </div>
     