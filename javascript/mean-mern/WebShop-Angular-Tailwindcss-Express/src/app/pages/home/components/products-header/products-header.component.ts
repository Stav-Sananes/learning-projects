import { Component, OnInit, Output, EventEmitter } from "@angular/core";

@Component({
  selector: "app-products-header",
  templateUrl: "./products-header.component.html",
})
export class ProductsHeaderComponent implements OnInit {
  @Output() columnsCountChange = new EventEmitter<number>();
  @Output() SortChange = new EventEmitter<string>();
  @Output() itemCountChange = new EventEmitter<number>();

  sort = "desc";
  itemsShowCount = 12;
  constructor() {}

  ngOnInit(): void {}

  onSortUpdate(newSort: string): void {
    this.sort = newSort;
    this.SortChange.emit(newSort);
  }
  onItemsUpdate(count: number): void {
    this.itemsShowCount = count;
    this.itemCountChange.emit(count);
  }
  onColumnsUpdate(colsNum: number): void {
    this.columnsCountChange.emit(colsNum);
  }
}
