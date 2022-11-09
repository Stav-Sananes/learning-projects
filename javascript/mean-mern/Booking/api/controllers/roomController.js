import Room from "../models/Room";
import Hotel from "../models/Hotel";
import { createError } from "../utils/error";

export const createRoom = async (req, res, next) => {
  const hotelId = req.params.hotelid;
  const newRoom = new Room(req.body);

  try {
    const savedRoom = await newRoom.save();
    try {
      await Hotel.findByIdAndUpdate(hotelId, {
        $push: { rooms: savedRoom._id },
      });
    } catch (error) {
      next(error);
    }
    res.status(200).json(savedRoom);
  } catch (error) {
    next(error);
  }
};
export const UpdateRoom = async (req, res, next) => {
  try {
    const updateRoomInfo = await Room.findByIdAndUpdate(req.params.id, {
      $set: req.body,
    });
    try {
      await Hotel.findByIdAndUpdate(hotelId, {
        $pull: { rooms: req.params.id },
      });
    } catch (error) {
      next(error);
    }
    res.status(200).json(updateRoomInfo);
  } catch (error) {
    next(error);
  }
};
export const UpdateRoomAvailability = async (req, res, next) => {
  try {
    await Room.updateOne({ "RoomNumbers._id": req.params.id },{
      $push:{
        "RoomNumbers.$.unavailableDates":req.body.dates
      }
    });
    res.status(200).json(updateRoomInfo);
  } catch (error) {
    next(error);
  }
};

export const DeleteRoom = async (req, res, next) => {
  const hotelId = req.params.hotelid;

  try {
    await Room.findByIdAndDelete(req.params.id);
    res.status(200).json("Room has been deleted");
  } catch (error) {
    next(error);
  }
};

export const getRoom = async (req, res, next) => {
  try {
    const findRoom = await Room.findById(req.params.id);
    res.status(200).json(findRoom);
  } catch (error) {
    next(error);
  }
};
export const getAllRooms = async (req, res, next) => {
  try {
    const rooms = await Room.find();
    res.status(200).json(rooms);
  } catch (error) {
    next(error);
  }
};
