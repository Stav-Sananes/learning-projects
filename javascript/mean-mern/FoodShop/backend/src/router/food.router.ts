import { Router } from "express";
import { sample_foods, sample_tags } from "../data";
import asyncHandler from "express-async-handler";
import { foodModel, FoodSchema } from "../models/food.model";
const router = Router();

router.get(
  "/",
  asyncHandler(async (req, res) => {
    const food = await foodModel.find();
    res.send(food);
  })
);

router.get(
  "/seed",
  asyncHandler(async (req, res) => {
    const foodCount = await foodModel.countDocuments();
    if (foodCount > 0) {
      res.send("Seed is already done!");
      return;
    }
    await foodModel.create(sample_foods);
    res.send("Done!");
  })
);
router.get("/search/:searchTerm",asyncHandler(
  async(req, res) => {
    const searchReg = new RegExp(req.params.searchTerm, "i");
    const food = await foodModel.find({name:{$regex:searchReg})
    res.send(food)
  }
));
router.get("/tags", asyncHandler(
  async(req, res) => {
    const tags = await foodModel.aggregate([
      {

      $unwind:'$tags'
    },
    {
      $group:{
        _id:'$tags',
        count:{$sum:1}
      }
    },
    {
      $project:{
        _id:0,
        name:'$_id',
        count:'$count'
      }
    }
   
      
    ]).sort({count:-1})
    const all = {
      name: 'All',
      count: await foodModel.countDocuments()
    }
    tags.unshift(all);
    res.send(tags);
  }
));
router.get("/tag/:tagName",asyncHandler(
  async (req, res) => {
    const food = await foodModel.find({tags:req.params.tagName})
    res.send(food);
  }
));

router.get("/:foodId", asyncHandler(
  async (req, res) => {
    const food = await foodModel.findById(req.params.foodId)
      res.send(food);
    }
));

const port = 5000;

export default router;
