<?php

namespace Tests\Unit\Model;

use App\Model\Category;
use App\Model\Comment;
use App\Model\Favorite;
use App\Model\OrderDetail;
use App\Model\Product;
use App\Model\ProductImage;
use App\Model\Rating;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;

class ProductTest extends TestCase
{
    protected $product;

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->product = Product::firstOrCreate(['name' => 'Testing'], [
            'name' => 'Testing',
            'price' => 1234,
            'category_id' => 1,
        ]);
    }

    public function test_contains_valid_fillable_properties()
    {
        $this->assertEquals([
            "name",
            "price",
            "category_id",
        ], $this->product->getFillable());
    }

    public function test_product_belong_to_category()
    {
        $product = $this->product;

        $this->assertInstanceOf(Category::class, $product->category);
    }

    public function test_product_has_many_order_details()
    {
        $product = $this->product;

        $orderDetails = OrderDetail::firstOrCreate(['product_id' => $product->id], [
            'order_id' => 1,
            'product_id' => $product->id,
            'quantity' => 1,
            'unit_price' => 1234,
        ]);

        $this->assertTrue($product->orderDetails->contains($orderDetails));
        $this->assertInstanceOf(Collection::class, $product->orderDetails);
    }

    public function test_product_has_many_ratings()
    {
        $product = $this->product;

        $rating = Rating::firstOrCreate(['product_id' => $product->id], [
            'rated_index' => 1,
            'user_id' => 1,
            'product_id' => $product->id,
        ]);

        $this->assertTrue($product->ratings->contains($rating));
        $this->assertInstanceOf(Collection::class, $product->ratings);

    }

    public function test_product_has_many_comments()
    {
        $product = $this->product;

        $comment = Comment::firstOrCreate(['product_id' => $product->id], [
            'comment' => 'Testing',
            'user_id' => 1,
            'product_id' => $product->id,
        ]);

        $this->assertTrue($product->comments->contains($comment));
        $this->assertInstanceOf(Collection::class, $product->comments);
    }

    public function test_product_has_many_images()
    {
        $product = $this->product;

        $productImage = ProductImage::firstOrCreate(['product_id' => $product->id], [
            'image_path' => 'Testing',
            'image_type' => 1,
            'product_id' => $product->id,
        ]);

        $this->assertTrue($product->productImages->contains($productImage));
        $this->assertInstanceOf(Collection::class, $product->productImages);
    }

    public function test_product_has_many_favorites()
    {
        $product = $this->product;

        $favorite = Favorite::firstOrCreate(['product_id' => $product->id], [
            'user_id' => 1,
            'product_id' => $product->id,
        ]);

        $this->assertTrue($product->favorites->contains($favorite));
        $this->assertInstanceOf(Collection::class, $product->favorites);
    }
}
