import { Injectable, EventEmitter } from '@angular/core';
import { AppHttpService } from '../../../app-http.service';

@Injectable()
export class SecretfriendService extends AppHttpService {
    eventEmitter: EventEmitter<any> = new EventEmitter;

    key = 'participant';
    cartAux = JSON.parse(localStorage.getItem(this.key) || null);

    builder(resource: string = '') {
        return super.builder(resource);
    }

    clear()
    {
        this.initCart();
    }

    get()
    {
        return JSON.parse(localStorage.getItem(this.key) || null);
    }

    getItem(i)
    {
        return this.get().items[i];
    }

    addItem(item)
    {
        var cart = this.get(),itemAux,exists = false;

       for (var index in cart.participants){
            itemAux = cart.participants[index];
            if (itemAux.id == item.id){
                exists = true;
                break;
            }
        }
        if (!exists){
            item.participant_id = item.id;
            cart.participants.push(item);
        }

        localStorage.setItem(this.key,JSON.stringify(cart));
    }

    removeItem(i)
    {
        let cart = this.get();
        cart.items.splice(i,1);
        localStorage.setItem(this.key,JSON.stringify(cart));
    }

    initCart()
    {
        localStorage.setItem(this.key,JSON.stringify({
            participants:[]
        }));
    }

}