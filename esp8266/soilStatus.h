// soilStatus.h
// Declare moisture status of soil

#ifndef SOILSTATE_H
#define SOILSTATE_H

typedef struct soil_state {
  bool error;
  bool dry;
  bool humid;
  bool water;
} soil_state;

#endif // SOILSTATE_H