import {
  Component,
  ElementRef,
  Input,
  OnChanges,
  ViewChild,
} from "@angular/core";
import {
  Map,
  LatLngTuple,
  icon,
  Marker,
  map,
  LatLng,
  marker,
  tileLayer,
  LatLngExpression,
  LeafletMouseEvent,
} from "leaflet";
import { LocationService } from "src/app/services/location.service";
import { Order } from "src/app/shared/models/Order";
@Component({
  selector: "map",
  templateUrl: "./map.component.html",
  styleUrls: ["./map.component.css"],
})
export class MapComponent implements OnChanges {
  @Input()
  order!: Order;
  @Input()
  readonly = false;
  private readonly MARKER_ZOOM_LEVEL = 16;
  private readonly MARKER_ICON = icon({
    iconUrl:
      "https://res.cloudinary.com/foodmine/image/upload/v1638842791/map/marker_kbua9q.png",
    iconSize: [42, 42],
    iconAnchor: [21, 42],
  });
  private readonly DEFAULT_LATING: LatLngTuple = [13.75, 21.62];
  @ViewChild("map", { static: true })
  mapRef!: ElementRef;

  map!: Map;

  currentMarker!: Marker;
  constructor(private locationService: LocationService) {}

  ngOnChanges(): void {
    if (!this.order) return;
    this.initialzieMap();

    if (this.readonly && this.addressLatLng) {
      this.showLocationOnRead();
    }
  }
  showLocationOnRead() {
    const mapRead = this.map;
    this.setMarker(this.addressLatLng);
    mapRead.setView(this.addressLatLng, this.MARKER_ZOOM_LEVEL);

    mapRead.dragging.disable();
    mapRead.touchZoom.disable();
    mapRead.doubleClickZoom.disable();
    mapRead.scrollWheelZoom.disable();
    mapRead.boxZoom.disable();
    mapRead.keyboard.disable();
    mapRead.off('click');
    mapRead.tap?.disable();
    this.currentMarker.dragging?.disable();
  }

  initialzieMap() {
    if (this.map) return;

    this.map = map(this.mapRef.nativeElement, {
      attributionControl: false,
    }).setView(this.DEFAULT_LATING, 1);
    tileLayer("https://{s}.title.osm.org/{z}/{x}/{y}.png").addTo(this.map);
    this.map.on("click", (e: LeafletMouseEvent) => {
      this.setMarker(e.latlng);
    });
  }
  findMyLocation() {
    this.locationService.getCurrentLocation().subscribe({
      next: (latlng) => {
        this.map.setView(latlng, this.MARKER_ZOOM_LEVEL);
        this.setMarker(latlng);
      },
    });
  }
  setMarker(latlng: LatLngExpression) {
    this.addressLatLng = latlng as LatLng;
    if (this.currentMarker) {
      this.currentMarker.setLatLng(latlng);
      return;
    }
    this.currentMarker = marker(latlng, {
      draggable: true,
      icon: this.MARKER_ICON,
    }).addTo(this.map);
    this.currentMarker.on("dragend", () => {
      this.addressLatLng = this.currentMarker.getLatLng();
    });
  }
  set addressLatLng(latlng: LatLng) {
    if (!latlng.lat.toFixed) return;
    latlng.lat = parseFloat(latlng.lat.toFixed(8));
    latlng.lng = parseFloat(latlng.lat.toFixed(8));
    this.order.addressLatLng = latlng;
    console.log(this.order.addressLatLng);
  }
  get addressLatLng() {
    return this.order.addressLatLng!;
  }
}
