import { Injectable, EventEmitter } from '@angular/core';
import { AppHttpService } from '../../../app-http.service';

@Injectable()
export class ParticipantsService extends AppHttpService {
    eventEmitter: EventEmitter<any> = new EventEmitter;

    builder(resource: string = '') {
        return super.builder(resource);
    }


    public getCep = function (cep: number) {
        let url = 'https://viacep.com.br/ws/' + cep + '/json/';
        return this.request().get(url)
            .toPromise()
            .then((res) => {
                return res.json() || {};
            });
    }
}