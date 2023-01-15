import category from '../models/Category.js';

const index = async (req, res) => {

    try {
        const categories = await category.find({status: 'active'});

        if(!categories) {
            throw { code: 500, message: 'Categories not found' };
        }


        return res.status(200).json({
            status: 'success',
            total: categories.length,
            categories
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

        const title  = req.body.title;
        const newCategory = new category({
            title: title,
        });

        const Category = await newCategory.save();

        if(!Category) {
            throw { code: 500, message: 'Category not created' };
        }

        res.status(200).json({
            status: 'success',
            Category 
        });
    } catch (error) {
        res.status(error.code).json({
            status: 'error',
            message: error.message
        });
    }


}

export {index, store}
