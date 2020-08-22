<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('description', 255);
            $table->string('author');
            $table->string('location');
            $table->date('publishedOn');
            $table->double('price');
            $table->string('image');
            //$table->enum('type', array('Science fiction','Satire','Drama', 'Action and Adventure', 'Romance', 'Mystery', 'Horror', 'Self help', 'Health', 'Guide', 'Travel', "Children's", 'Religion, Spirituality & New Age', 'Science', 'History', 'Maths', 'Anthology', 'Poetry', 'Encyclopedias', 'Dictionaries', 'Comics', 'Art', 'Cookbooks', 'Diaries', 'Journals', 'Prayer books', 'Series', 'Trilogy', 'Biographies', 'Autobiographies', 'Fantasy' ));
            $table->string('type');
            // $table->boolean('isSold');
            $table->string('ISBN')->nullable();
            // $table->integer('age');
            $table->integer('quantity');
            $table->unsignedBiginteger('contact');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
