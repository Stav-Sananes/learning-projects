import express from 'express'
import { createRoom, DeleteRoom, getAllRooms, getRoom, UpdateRoom, UpdateRoomAvailability } from '../controllers/roomController';
import { verifyAdmin } from '../utils/verifyToken.js';

const router = express.Router();

router.post("/:hotelid", verifyAdmin,createRoom);

router.put("/:id", verifyAdmin,UpdateRoom);
router.put("availability/:id",UpdateRoomAvailability);
router.delete("/:id/:hotelid", verifyAdmin, DeleteRoom);
router.get("/:id", getRoom);
router.get("/", getAllRooms);


export default router