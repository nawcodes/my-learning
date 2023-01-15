import product from '../models/Product.js';
import category from '../models/Category.js';
import mongoose from 'mongoose';

const index = async (req, res) => {

    try {
        const products = await product.find({status: 'active'});

        if(!products) {
            throw { code: 500, message: 'product not found' };
        }


        return res.status(200).json({
            status: 'success',
            total: products.length,
            products
        });

    } catch (error) {
        res.status(error.code).json({
            status: 'error',
            message: error.message
        });
    }


}

const store = async (req, res) => {

    try {
        if(!req.body.title) throw { code: 428, message: 'Title is required' };
        if(!req.body.thumbnail) throw { code: 428, message: 'Thumbnail is required' };
        if(!req.body.price) throw { code: 428, message: 'Price is required' };
        if(!req.body.categoryId) throw { code: 428, message: 'Category is required' };
        if(!req.body.status) throw { code: 428, message: 'Status is required' };

        // product exist
        const productExist = await product.findOne({ title: req.body.title });
        if(productExist) throw { code: 409, message: 'Product already exist' };

        // is object id 
        if(!mongoose.Types.ObjectId.isValid(req.body.categoryId)) throw { code: 409, message: 'Category invalid' };

        // is categoryId exist
        const categoryExist = await category.findOne({ _id: req.body.categoryId });
        if(!categoryExist) throw { code: 409, message: 'Category not found' };

        const title  = req.body.title;
        const thumbnail = req.body.thumbnail;
        const price = req.body.price;
        const categoryId = req.body.categoryId;
        const status = req.body.status;

        const newProduct = new product({
            title: title,
            thumbnail: thumbnail,
            price: price,
            categoryId: categoryId,
            status: status,
        });

        const Product = await newProduct.save();

        if(!Product) {
            throw { code: 500, message: 'Product not created' };
        }

        res.status(200).json({
            status: 'success',
            Product 
        });
    } catch (error) {
        if(!error.code) error.code = 500;
        res.status(error.code).json({
            status: 'error',
            message: error.message
        });
    }


}

export {index, store}
