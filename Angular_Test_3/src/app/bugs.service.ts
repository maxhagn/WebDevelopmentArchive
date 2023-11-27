import { Injectable } from '@angular/core';
import { mockBugs } from './mock-bug'

@Injectable()
export class BugsService {
    getContent(): any {
      console.log(mockBugs);
      return Promise.resolve(mockBugs);
    }
}
