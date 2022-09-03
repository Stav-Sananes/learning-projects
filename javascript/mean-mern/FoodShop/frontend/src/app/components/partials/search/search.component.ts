import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-search',
  templateUrl: './search.component.html',
  styleUrls: ['./search.component.css'],
})
export class SearchComponent implements OnInit {
  search = '';
  constructor(activate: ActivatedRoute, private router: Router) {
    activate.params.subscribe((parmas) => {
      if (parmas.search) this.search = parmas.search;
    });
  }

  ngOnInit(): void {}
  searchT(search: string) {
    if (search) this.router.navigateByUrl('/search/' + search);
  }
}
