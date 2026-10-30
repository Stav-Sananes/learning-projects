import express from "express";
import {
  countByCity,
  countByType,
  createHotel,
  DeleteHotel,
  getAllHotels,
  getHotel,
  getHotelRooms,
  UpdateHotel,
} from "../controllers/hotelController.js";
import Hotel from "../models/Hotel.js";
import { verifyAdmin } from "../utils/verifyToken.js";

const router = express.Router();

router.post("/", verifyAdmin,createHotel);

router.put("/:id", verifyAdmin,UpdateHotel);

router.delete("/find/:id", verifyAdmin, DeleteHotel);

router.get("/:id", getHotel);

router.get("/", getAllHotels);
router.get("/countByCity", countByCity);
router.get("/countByType", countByType);
router.get("/room/:id", getHotelRooms);

export default router;
