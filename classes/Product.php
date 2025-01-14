<?php
class Product
{


    public function __construct(
        private int $id,
        private string $name,
        private string $description,
        private float $price
    ) {}

    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Set the value of description
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of price
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * Set the value of price
     */
    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public static function findAllProduct(): array
    {
        $pdo = Database::getInstance()->getPDO();
        $query = $pdo->prepare("SELECT * FROM product");
        $query->execute();

        $products = $query->fetchAll(PDO::FETCH_ASSOC);
        $productsObjects = [];
        foreach ($products as $product) {
            $productsObjects[] = new Product($product["id"], $product["name"], $product["description"], (float)$product["price"]);
        }
        return $productsObjects;
    }
    public static function findOneById(int $id): self|bool
    {
        $pdo = Database::getInstance()->getPDO();
        $query = $pdo->prepare("SELECT * FROM product WHERE id = :id");
        $query->bindValue(":id", $id, PDO::PARAM_INT);
        $query->execute();

        $product = $query->fetch(PDO::FETCH_ASSOC);
        if ($product) {
            $productObject = new Product($product["id"], $product["name"], $product["description"], (float)$product["price"]);
            return $productObject;
        }
        return false;
    }
}
