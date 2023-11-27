import {Injectable} from '@angular/core';
import {mockData} from './mock-data'

@Injectable()
export class DataService {
    getContent(): any {
        return Promise.resolve(mockData);
    }
}
